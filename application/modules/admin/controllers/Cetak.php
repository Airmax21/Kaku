<?php defined('BASEPATH') or exit('No direct script access allowed');

class Cetak extends MY_Controller
{
    var $cookie;
    public function __construct()
    {
        // Load the constructer from MY_Controller
        parent::__construct();
        $this->load->model(array(
            'app/m_app',
            'm_detail_order',
            'm_order',
        ));
        $this->cookie = $this->m_app->get_cookie_user();
        if ($this->cookie['role'] != 1) redirect('login/pegawai');
    }

    public function harian()
    {
        // 
        // $data['identitas_pasien'] = $this->m_pelayanan->get_data($reg_id);
        // $data['main'] = $this->m_pelayanan->konsultasi_data($data['identitas_pasien']['pasien_id'], $data['identitas_pasien']['reg_id'], $data['identitas_pasien']['lokasi_id']);
        // $date = date('d - M - Y');
        //
       
        $data['order'] = $this->m_order->order_data_harian();
        foreach ($data['order'] as $dat) {
            $id = $dat['order_id'];
            $data['detail'][$id] = $this->m_detail_order->detail_order_data($id);
        }
        $pdfFilePath = 'laporan_harian.pdf';
        $pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        //

        $pdf->simpleTables = true;
        $pdf->packTableData = true;
        // $setFooter = '00/2016.21 Assesmen Medis Rawat Jalan Penyakit Jantung dan Pembuluh Darah';
        // $pdf->setFooter($setFooter . '| |halaman {PAGENO} dari {nb}');

        $html = $this->load->view('admin/cetak_harian',$data,true);
        $pdf->WriteHTML($html);
        $pdf->Output($pdfFilePath, "I");
    }
}
