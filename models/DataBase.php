<?

require_once 'config/constante.php';

class DataBase
{

  private static $instance = null;
  private $query = null;
  private $db;

  public static function Instance()
  {

    if (self::$instance == null) {
      self::$instance = new DataBase();
    }
    return self::$instance;
  }

  function __construct()
  {
    $connect_str = DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME;
    $this->db = new PDO($connect_str, DB_USER, DB_PASS);

    $error_arr = $this->db->errorInfo();

    if ($this->db->errorCode() != 0000)
      echo "SQL ошибка: " . $error_arr[2] . "<br>";
  }

  function Select($methods = null, $where_key = null, $where_value = null, $operation = null, $fethAll = false, $limit = null)
  {
    switch ($methods){
      case 'index':
        if($limit)
          $str = "limit $limit";

        $this->query = " SELECT product.id_product, catalog.id_catalog, image.src, image.src_mini, brand_info.name, brand_info.short_info,
    brand_info.info, catalog.price, gender.genders FROM catalog
    JOIN product USING (id_product)
    JOIN gender USING (id_gender)
    join image USING (id_img)
    join brand_info USING (id_brand_info) where " . $where_key . " $operation ?". $str;
        break;
      case 'basket':
        $this->query = "SELECT * from cart join catalog using (id_catalog) join gender USING (id_gender) join status USING (id_status)
    join product using (id_product) join image USING (id_img)
    join brand_info USING (id_brand_info) where $where_key = ? and id_status = 1";
        break;
      case 'orders':
        $this->query = "SELECT * from cart join catalog using (id_catalog) join gender USING (id_gender) join status USING (id_status)
    join product using (id_product) join image USING (id_img)
    join brand_info USING (id_brand_info) where $where_key = ?";
        break;
      case 'user':
        $this->query = "select * from users where $where_key = ?";
        break;
    }

      $result = $this->db->prepare($this->query);
      $result->execute([$where_value]);


      if($fethAll){
        return $result->fetchAll();
      } else return $result->fetch();

  }

  public function Insert($table, $object)
  {

    $columns = array();
    $masks = array();

    foreach ($object as $key => $value) {

      $columns[] = $key;
      $masks[] = ":$key";

      if ($value === null) {
        $object[$key] = 'NULL';
      }
    }

    $columns_s = implode(',', $columns);
    $masks_s = implode(',', $masks);

    $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

    $q = $this->db->prepare($query);
    $q->execute($object);

  }

  public function Update($table, $object, $where)
  {

    $sets = array();

    foreach ($object as $key => $value) {

      $sets[] = "$key=:$key";

      if ($value === NULL) {
        $object[$key] = 'NULL';
      }
    }

    $sets_s = implode(',', $sets);
    $query = "UPDATE $table SET $sets_s WHERE $where";

    $q = $this->db->prepare($query);
    $q->execute($object);
  }

  public function Delete($table, $where){

    $query = "DELETE FROM $table WHERE $where";
    $q = $this->db->prepare($query);
    $q->execute();
  }
}