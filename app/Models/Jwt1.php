<?PHP
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Jwt1 extends Authenticatable implements JWTSubject
{
    //資料表名稱
    protected $table = 'jwt1';

    //主鍵名稱
    protected $promaryKey = 'id';

    //可變動欄位
    protected $fillable = [
      'id',
      'cover',
      'account',
      'password',
      'name',
      'phone',
      'releases',
    ];
    public function getJWTIdentifier() {
      return $this->getKey();
    }

    public function getJWTCustomClaims() {
      return [];
      // return ['role' => 'jwt2'];
    }
}
?>

