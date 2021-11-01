<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Assestment;
use CodeIgniter\API\ResponseTrait;

use App\Models\Resume;
use App\Models\Diklat;
use App\Models\Karya;
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

}
