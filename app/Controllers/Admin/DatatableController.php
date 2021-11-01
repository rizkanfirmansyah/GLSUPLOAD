<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

use App\Models\Resume;
use App\Models\Diklat;

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

}
