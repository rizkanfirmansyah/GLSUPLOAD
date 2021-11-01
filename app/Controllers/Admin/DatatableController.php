<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Antologi;
use App\Models\Assestment;
use CodeIgniter\API\ResponseTrait;

use App\Models\Resume;
use App\Models\Diklat;
use App\Models\Kota;
use App\Models\Media;
use App\Models\Partisipasi;
use App\Models\Video;

use App\Models\Book;
use App\Models\Review;

use App\Models\Diorama;

use App\Models\Karya;
use App\Models\Puisi;
use App\Models\Pantun;


class DatatableController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
    }

    public function peserta()
    {
        $resume = new Resume();
        $query = $resume->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'resume_name' => $q->resume_name,
                'resume_ids' => $q->resume_ids,
                'resume_token' => $q->resume_token,
                'resume_city' => $q->resume_city,
                'resume_category' => $q->resume_category,
                'resume_subcategory' => $q->resume_subcategory,
                'resume_participant' => $q->resume_participant,
                'resume_status' => $q->resume_status,
                'resume_agency' => $q->resume_agency,
                'resume_agency_address' => $q->resume_agency_address,
                'resume_agency_new' => $q->resume_agency_new,
                'resume_agency_address_new' => $q->resume_agency_address_new,
                'resume_gender' => $q->resume_gender,
                'resume_phone' => $q->resume_phone,
                'resume_email' => $q->resume_email,
                'resume_facebook' => $q->resume_facebook,
                'resume_instagram' => $q->resume_instagram,
                'resume_photo' => $q->resume_photo,
                'resume_suggestion' => $q->resume_suggestion,
                'resume_impression' => $q->resume_impression,
                'created_at' => $q->created_at,
            ];
            $results['data'] = $action;
        }

        // return $this->setResponseFormat('json')->respond($query2);
        return $this->respond($results);
    }

    public function biodata()
    {
        $resume = new Resume();
        $query = $resume->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'resume_name' => $q->resume_name,
                'resume_ids' => $q->resume_ids,
                'resume_token' => $q->resume_token,
                'resume_city' => $q->resume_city,
                'opsi' => ' <div class="d-flex justify-content-between">
                            <a href="javascript:void(0)" class="badge badge-pill badge-warning" onclick=deletePeserta("'.$q->id .'")><i class="lni lni-trash-can p-2"></i></a>
                            <a href="javascript:void(0)" class="badge badge-pill badge-info" onclick=viewPeserta("'.$q->resume_ids.'","'. $q->resume_token.'")><i class="lni lni-eye p-2"></i></a>
                            </div>'
            ];
            $results['data'] = $action;
        }

        // return $this->setResponseFormat('json')->respond($query2);
        return $this->respond($results);
    }

    public function diklat()
    {
        $diklat = new Diklat();
        $query = $diklat->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'diklat_ids' => $q->diklat_ids,
                'diklat_token' => $q->diklat_token,
                'diklat_name' => $q->diklat_name,
                'created_at' => $q->created_at,
                'link_diklat' => base_url().'/diklat/'.$q->diklat_ids.'/'.$q->diklat_name,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function book()
    {
        $book = new Book();
        $query = $book->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;

        $i = 0;
        foreach ($query as $q){
            $action[] = [
                'number' => $i+=1,
                'book_ids' => $q->book_ids,
                'book_token' => $q->book_token,
                'book_author' => $q->book_author,
                'book_publisher' => $q->book_publisher,
                'book_year' => $q->book_year,
                'book_page' => $q->book_page,
                'book_cover' => $q->book_cover,
                'created_at' => $q->created_at,
                'link_book' => base_url().'/baca-buku/'.$q->book_ids.'/'.$q->book_cover,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
        
    }

    public function partisipasi()
    {
        $partisipasi = new Partisipasi();
        $query = $partisipasi->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'partisipasi_ids' => $q->partisipasi_ids,
                'partisipasi_token' => $q->partisipasi_token,
                'partisipasi_pameran' => $q->partisipasi_pameran,
                'partisipasi_festival' => $q->partisipasi_festival,
                'partisipasi_kemah' => $q->partisipasi_kemah,
                'partisipasi_tantangan' => $q->partisipasi_tantangan,
                'created_at' => $q->created_at,
                'link_partisipasi' => base_url().'/partisipasi/'.$q->partisipasi_ids.'/'.$q->partisipasi_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function review()
    {
        $review = new Review();
        $query = $review->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;
        $i = 0;
        foreach($query as $q){

            switch ($q->review_category) {
                case '1':
                    $category = 'ISHIKAWA FISH BONE';
                    break;
                case '2':
                    $category = 'AIH';
                    break;
                case '3':
                    $category = 'Y CHART';
                    break;
                case '4':
                    $category = 'INFO GRAFIS';
                    break;
                case '5':
                    $category = 'LAINNYA';
                    break;
                default:
                    $category = '';
                    break;
            }

            $action[] = [
                'number'      => $i+=1,
                'review_ids' => $q->review_ids,
                'review_token' => $q->review_token,
                'review_category' => $category,
                'review_cover' => $q->review_cover,
                'created_at' => $q->created_at,
                'link_book' => base_url().'/review-buku/'.$q->review_ids.'/'.$q->review_cover,
            ];
        }
        return $this->respond($results);
    }

    public function literasi()
    {
        $literasi = new Assestment();
        $query = $literasi->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            switch ($q->assestment_analisa) {
                case '1':
                    $analisa = 'Peserta Perorangan';
                    break;
                case '2':
                    $analisa = 'Peserta GLK';
                    break;
                case '3':
                    $analisa = 'Peserta GLM';
                    break;
                case '4':
                    $analisa = 'Peserta GLS';
                    break;
                default:
                    $analisa = '';
                    break;
            }
            $action[] = [
                'number'      => $i+=1,
                'assestment_ids' => $q->assestment_ids,
                'assestment_token' => $q->assestment_token,
                'assestment_jenis' => ($q->assestment_jenis == '1') ? 'Personal' : '',
                'assestment_analisa' => $analisa,
                'created_at' => $q->created_at,
                'link_assestment' => base_url().'/assestment/'.$q->assestment_ids.'/'.$q->assestment_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
        
    }

    public function diorama()
    {
        $diorama = new Diorama();
        $query = $diorama->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        // $results['data'] = $query;

        $i = 0;
        foreach ($query as $q){
            $action[] = [
                'number' => $i+=1,
                'diorama_ids' => $q->diorama_ids,
                'diorama_token' => $q->diorama_token,
                'diorama_first' => $q->diorama_first,
                'diorama_last' => $q->diorama_last,
                'created_at' => $q->created_at,
                'link_diorama' => ($q->diorama_first != '' ? base_url().'/diorama/'.$q->diorama_ids.'/'.$q->diorama_first : ' ').($q->diorama_last != '' ? base_url().'/diorama/'.$q->diorama_ids.'/'.$q->diorama_last : ' '),
            ];
            $results['data'] = $action;
        }
        return $this->respond($results);

    }

    public function video()
    {
        $video = new Video();
        $query = $video->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'video_ids' => $q->video_ids,
                'video_token' => $q->video_token,
                'video_link_kegiatan' => $q->video_link_kegiatan,
                'video_link_cerita' => $q->video_link_cerita,
                'created_at' => $q->created_at,
                'link_video' => base_url().'/video/'.$q->video_ids.'/'.$q->video_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function karya()
    {
        $karya = new Karya();
        $query = $karya->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'karya_ids' => $q->karya_ids,
                'karya_token' => $q->karya_token,
                'karya_cerpen' => $q->karya_cerpen,
                'karya_carpon' => $q->karya_carpon,
                'karya_story' => $q->karya_story,
                'karya_artikel' => $q->karya_artikel,
                'created_at' => $q->created_at,
                'link_naskah' => ($q->karya_cerpen != '' ? base_url().'/karya/'.$q->karya_ids.'/naskah/'.$q->karya_cerpen : ' ').
                '\\n\\n'.($q->karya_carpon != '' ? base_url().'/karya/'.$q->karya_ids.'/naskah/'.$q->karya_carpon : ' ').
                '\\n\\n'.($q->karya_story != '' ? base_url().'/karya/'.$q->karya_ids.'/naskah/'.$q->karya_story : ' ').
                '\\n\\n'.($q->karya_artikel != '' ? base_url().'/karya/'.$q->karya_ids.'/naskah/'.$q->karya_artikel : ' '),
                'link_karya' => base_url().'/karya/'.$q->karya_ids.'/'.$q->karya_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function puisi()
    {
        $puisi = new Puisi();
        $query = $puisi->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'puisi_ids' => $q->puisi_ids,
                'puisi_token' => $q->puisi_token,
                'puisi_naskah' => $q->puisi_naskah,
                'created_at' => $q->created_at,
                'link_puisi' => ($q->puisi_naskah != '' ? base_url().'/karya/'.$q->puisi_ids.'/puisi/'.$q->puisi_naskah : ' '),
            ];
        }
        return $this->respond($results);
    }

    public function literasiMedia()
    {
        $media = new Media();
        $query = $media->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'media_ids' => $q->media_ids,
                'media_token' => $q->media_token,
                'media_majalah' => $q->media_majalah,
                'media_ssig' => $q->media_ssig,
                'media_ssfb' => $q->media_ssfb,
                'media_ssyt' => $q->media_ssyt,
                'media_kegiatan_ig' => $q->media_kegiatan_ig,
                'media_kegiatan_fb' => $q->media_kegiatan_fb,
                'media_kegiatan_yt' => $q->media_kegiatan_yt,
                'media_kegiatan_wa' => $q->media_kegiatan_wa,
                'created_at' => $q->created_at,
                'link_media' => base_url().'/media/'.$q->media_ids.'/'.$q->media_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function pantun()
    {
        $pantun = new Pantun();
        $query = $pantun->asObject()->findAll();

        // dd($query); 
        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'pantun_ids' => $q->pantun_ids,
                'pantun_token' => $q->pantun_token,
                'pantun_naskah' => $q->pantun_naskah,
                'created_at' => $q->created_at,
                'link_pantun' => ($q->pantun_naskah != '' ? base_url().'/karya/'.$q->pantun_ids.'/pantun/'.$q->pantun_naskah : ' '),
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function literasiKota()
    {
        $kota = new Kota();
        $query = $kota->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'kota_ids' => $q->kota_ids,
                'kota_token' => $q->kota_token,
                'kota_nama' => $q->kota_nama,
                'created_at' => $q->created_at,
                'link_kota' => base_url().'/kota/'.$q->kota_ids.'/'.$q->kota_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

    public function antologi()
    {
        $antologi = new Antologi();
        $query = $antologi->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'antologi_ids' => $q->antologi_ids,
                'antologi_token' => $q->antologi_token,
                'antologi_cover' => $q->antologi_cover,
                'antologi_judul' => $q->antologi_judul,
                'antologi_category' => $q->antologi_category,
                'antologi_peserta' => $q->antologi_peserta,
                'created_at' => $q->created_at,
                'link_antologi' => base_url().'/antologi/'.$q->antologi_ids.'/'.$q->antologi_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
        return $this->respond($results);
    }

}
