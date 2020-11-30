<div style="background-color: #DAE8FC; text-align: center; ">
    <h1>HELLO LARAVEL</h1>
    <a href="https://nentang.vn">nentang.vn</a>
</div>
<div style="text-align:center ;">Hôm nay là ngày: {{ date("d/m/Y: h:i:sa") }}</div> 
<div style="text-align:center ;">Họ và tên (escaped):{{ $ht }}</div>
<div style="text-align:center ;">Họ và tên ( ko escaped):{!! $ht !!}</div>
<div style="text-align:center ;">Họ và tên ( đầy đủ): @{{ $ht }}</div>
<div style="text-align:center ;">Lớp:{{ $l }}</div> 
@if ($dn == true) 
    <button>dangxuat</button> 
@else 
     <button>dangnhap</button> 
@endif