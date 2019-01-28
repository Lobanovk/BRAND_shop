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

  function SelectGoods($methods = null, $where_key = null, $where_value = null)
  {
    switch ($methods) {
      case 'index':
        $this->query = " SELECT product.id_product, catalog.id_catalog, image.src, image.src_mini, brand_info.name, brand_info.short_info,
    brand_info.info, catalog.price, gender.genders FROM catalog
    JOIN product USING (id_product)
    JOIN gender USING (id_gender)
    join image USING (id_img)
    join brand_info USING (id_brand_info) where " . $where_key . " < ?";
        break;
      case 'gender':
        $this->query = " SELECT product.id_product, catalog.id_catalog, image.src, image.src_mini, brand_info.name, brand_info.short_info,
    brand_info.info, catalog.price, gender.genders FROM catalog
    JOIN product USING (id_product)
    JOIN gender USING (id_gender)
    join image USING (id_img)
    join brand_info USING (id_brand_info) where $where_key = ?";
        break;
    }

    $result = $this->db->prepare($this->query);
    $result->execute([$where_value]);

    return $result->fetchAll();
  }


}