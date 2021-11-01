<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Antologi;
use App\Models\Assestment;
use CodeIgniter\API\ResponseTrait;

use App\Models\Resume;
use App\Models\Diklat;
use App\Models\Karya;
use App\Models\Kota;
use App\Models\Media;
use App\Models\Partisipasi;
use App\Models\Video;

class DatatableController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        //
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

    public function literasi()
    {
        $literasi = new Assestment();
        $query = $literasi->asObject()->findAll();

        $results['recordsTotal'] = count($query);
        $results['recordsTotalFiltered'] = count($query);
        $i = 0;
        foreach($query as $q){
            $action[] = [
                'number'      => $i+=1,
                'assestment_ids' => $q->assestment_ids,
                'assestment_token' => $q->assestment_token,
                'assestment_jenis' => $q->assestment_jenis,
                'assestment_analisa' => $q->assestment_analisa,
                'created_at' => $q->created_at,
                'link_assestment' => base_url().'/assestment/'.$q->assestment_ids.'/'.$q->assestment_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
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
                'link_karya' => base_url().'/karya/'.$q->karya_ids.'/'.$q->karya_token,
            ];
            $results['data'] = $action;
        }
        // dd($results);
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
