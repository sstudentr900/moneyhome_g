<?PHP
namespace App\Models;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
class Articleclass extends Model 
{
    //資料表名稱
    protected $table = 'articleclass';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'sort',
      'class',
      'releases',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
}
?>

