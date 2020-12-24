<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    const     CREATED_AT    = 'km_taoMoi';
    const     UPDATED_AT    = 'km_capNhat';

    protected $table        = 'cusc_khuyenmai';
    protected $fillable     = ['km_ten', 'km_taoMoi', 'km_capNhat', 'km_trangThai'];
    protected $guarded      = ['km_ma'];

    protected $primaryKey   = 'km_ma';

    protected $dates        = ['km_taoMoi', 'km_capNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';
}
