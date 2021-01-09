<?php

namespace App\Exports;

use App\SanPham;
use App\Loai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Storage;
class SanPhamExport implements FromView, WithDrawings, WithEvents, ShouldAutoSize
{
    use Exportable, RegistersEventListeners;

    public function view(): View
    {
        return view('backend.sanpham.excel', [
            'danhsachsanpham' => SanPham::all(),
            'danhsachloai' => Loai::all(),
        ]);
    }

    /**
     * @return BaseDrawing|BaseDrawing[]
     */
    public function drawings()
    {
        $arrDrawings = [];

        // Hình logo
        $drawingLogo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawingLogo->setName('Logo');
        $drawingLogo->setDescription('Logo');
        $drawingLogo->setPath(public_path('img/logo.jpeg'));
        $drawingLogo->setHeight(90);
        $drawingLogo->setCoordinates('C4');
        $offsetX = 40; //pixels
        $drawingLogo->setOffsetX($offsetX); //pixels
        $arrDrawings[] = $drawingLogo;

        // Dòng bắt đầu xuất Excel danh sách sản phẩm
        $startRow = 7;

        // Lấy danh sách Sản Phẩm
        $ds_sanpham = SanPham::all();
        foreach($ds_sanpham as $index=>$sp)
        {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName($sp->sp_ten);
            $drawing->setDescription($sp->sp_thongTin);
            if(Storage::exists('public/photos/' . $sp->sp_hinh))
                $drawing->setPath(public_path('storage/photos/' . $sp->sp_hinh));
            else
                $drawing->setPath(public_path('storage/photos/default.jpg'));
            $drawing->setHeight(40);
            $drawing->setWidth(40);
            $drawing->setCoordinates('B' . ($startRow + $index));
            $arrDrawings[] = $drawing;
        }

        return $arrDrawings;
    }

    /* Event beforeExport
    */
    public static function beforeExport(BeforeExport $event)
    {
        //
    }

    /* Event beforeWriting
    */
    public static function beforeWriting(BeforeWriting $event)
    {
        //
    }

    /* Event beforeSheet
    */
    public static function beforeSheet(BeforeSheet $event)
    {
        //
    }

    /* Event afterSheet
    */
    public static function afterSheet(AfterSheet $event)
    {
        // Set khổ giấy in ngang
        $event->sheet->getDelegate()->getPageSetup()
            ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // Set dòng 4 (dùng chứ ảnh logo) có chiều cao 100
        $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(100);

        // Format dòng tiêu đề giới thiệ "Công ty"
        $event->sheet->getDelegate()->getStyle('A1:C5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề "Danh sách sản phẩm"
        $event->sheet->getDelegate()->getStyle('A5:F5')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ]
            ]
        );

        // Format dòng tiêu đề "Tiêu đề cột"
        $event->sheet->getDelegate()->getStyle('A6:F6')->applyFromArray(
            [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ]
            ]
        );

        // Dòng bắt đầu xuất Excel danh sách sản phẩm
        $startRow = 7;

        // Lấy danh sách Sản Phẩm, set độ cao của dòng là 50
        $ds_sanpham = SanPham::all();
        foreach($ds_sanpham as $index=>$sp)
        {
            $currentRow = $startRow + $index;
            $event->sheet->getDelegate()->getRowDimension($currentRow)->setRowHeight(50);

            $coordinate = "A${currentRow}:F${currentRow}";
            $event->sheet->getDelegate()->getStyle($coordinate)->applyFromArray(
                [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
                        ],
                    ]
                ]
            );
        }
    }
}