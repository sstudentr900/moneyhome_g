<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DateTimeInterface;
class Manager extends Authenticatable implements JWTSubject
{
    //資料表名稱
    protected $table = 'manager';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'cover',
      'account',
      'password',
      'name',
      'phone',
      'releases',
    ];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function getJWTIdentifier() {
      return $this->getKey();
    }

    public function getJWTCustomClaims() {
      return [];
      // return ['role' => 'jwt1'];
    }
}
?>

