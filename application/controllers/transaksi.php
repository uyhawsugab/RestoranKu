<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('getMasakan_mdl','gtmsk');
        
    }
    

    public function index()
    {
        $data['konten'] = "pelanggan/v_transaksi";
        $this->load->view('template', $data);
        
    }

    public function showCartItems()
    {
        $data['total_cart'] = $this->cart->total_items();
        echo json_encode($data);
    }

    public function showPesanan()
    {
        $data['total_seluruh'] = $this->cart->total();
        $data['data_cart'] = $this->cart->contents();
        echo json_encode($data);
    }

    public function addCart($id_masakan,$jumlah,$no_meja)
    {
        $dataDetail = $this->gtmsk->getDetailMsk($id_masakan);
        $data = array(
            'id' => $dataDetail->id_masakan,
            'no_meja' => $no_meja,
            'qty' => $jumlah,
            'price' => $dataDetail->harga,
            'name' => $dataDetail->nama_masakan
        );

        $tambahCart = $this->cart->insert($data);
        if($tambahCart){
            $data['total_cart'] = $this->cart->total_items();
            $data['status'] = 1;
            echo json_encode($data);
        }else {
            $data['total_cart'] = $this->cart->total_items();
            $data['status'] = 0;
            echo json_encode($data);
        }
    }

    public function simpanBayar()
    {
        $createOrder = $this->gtmsk->createPesan();
        if ($createOrder) {
            $dataPesan = $this->gtmsk->getOrderTerakhir();
            foreach ($this->cart->contents() as $item) {
                $data[] = array(
                    'id_pesan' => $dataPesan->id_pesan,
                    'id_masakan' => $item['id'],
                    'no_meja' => $item['no_meja'],
                    'jumlah' => $item['qty']
                );
            }
            $insertDataPesan = $this->db->insert_batch('detail_pesan', $data);
            if ($insertDataPesan) {
                $this->gtmsk->updateTotalBayar($dataPesan->id_pesan);
                $data['status'] = 1;
                $data['id_pesan'] = $dataPesan->id_pesan;
                $data['total'] = $this->cart->total();
                $this->cart->destroy();
                echo json_encode($data);
            }else {
                $data['status'] = 0;
                echo json_encode($data);
            }
        }
    }
    public function deleteCart($id)
    {
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        $updateCart = $this->cart->update($data);
        if ($updateCart) {
            $data['status'] = 1;
            echo json_encode($data);
        }else {
            $data['status'] = 0;
            echo json_encode($data);
        }
    }
    public function deleteAllCart()
    {
        $this->cart->destroy();
        $data['status'] = 1;
        echo json_encode($data);
    }
}

/* End of file transaksi.php */
