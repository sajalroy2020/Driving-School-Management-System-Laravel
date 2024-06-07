<?php

namespace App\Http\Services;

use App\Models\Award;
use App\Models\Package;
use App\Traits\JsonResponseTrait;
use Exception;
use App\Models\FileHandler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PartialService
{
    use JsonResponseTrait;

    public function documentSectionContent()
    {
        $rowData = ' <div class="row rg-20 pt-30 singleDocumentRow">
                    <div class="col-md-6">
                        <div class="zForm-wrap">
                            <label for="asDocuemntsType" class="sf-form-label">'.__("Document Type").'</label>
                            <input type="text" name="document_type[]"class="form-control sf-form-control sf-form-control-2" id="asDocumentsName" placeholder="Enter Documents Type" />
                        </div>
                        <div class="docuemnt_type"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="zForm-wrap">
                            <label for="asDocumentsName" class="sf-form-label">'.__("Document Name").'</label>
                            <input type="text" name="document_name[]" class="form-control sf-form-control sf-form-control-2" id="asDocumentsName" placeholder="Enter Documents Name" />
                        </div>
                        <div class="docuemnt_name"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="zForm-wrap">
                            <label for="asUploadClientDocuments" class="sf-form-label">'.__("Upload Your Document").'</label>
                            <input type="file" name="documents_file[]" class="form-control sf-form-control sf-form-control-2" accept="image/*,video/*" />
                        </div>
                        <div class="documents_file"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button class="border-0 bd-ra-12 py-13 px-20 mt-30 bg-cancel fs-16 fw-600 lh-19 text-danger removeMoreDocument">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>';

        return $this->successResponse($rowData, 'row created');
    }
}
