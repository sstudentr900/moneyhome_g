<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Pages extends Model 
{
    //資料表名稱
    protected $table = 'pages';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'title',
      'tinymce',
    ];
    
}
?>

