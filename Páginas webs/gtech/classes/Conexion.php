<?PHP

class Conexion
{

    public const DB_SERVER = 'localhost';
    public const DB_USER = 'root';
    public const DB_PASS = '';
    public const DB_NAME = 'gtech';

    public const DB_DSN = 'mysql:host=' . self::DB_SERVER . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';



    protected static ?PDO $db = null;


    private static function conectar()
    {
        try {
            self::$db = new PDO(
                self::DB_DSN,
                self::DB_USER,
                self::DB_PASS,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                )
            );
        } catch (Exception $e) {
            die("No se pudo conectar al MySQL");
        }
    }
    
    /** @return PDO */
     
    public static function getConexion(): PDO {
        if(self::$db == null){
            self::conectar();
        }

        return self::$db; 
    }



}