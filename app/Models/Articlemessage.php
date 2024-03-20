<?PHP
namespace App\Models;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
class Articlemessage extends Model 
{
    //資料表名稱
    protected $table = 'articlemessage';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'nickname',
      'message',
      'releases',
      'article_id',
      'updated_at',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
}
?>

