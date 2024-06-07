<div class="d-flex justify-content-between align-items-center bd-b-one bd-c-stroke pb-20 mb-20">
    <h4 class="fs-18 fw-600 lh-18 text-main-color">{{__("Permission")}}</h4>
    <button type="button" class="border-0 p-0 bg-transparent text-para-text" data-bs-dismiss="modal" aria-label="Close">
        <i class="fa-solid fa-times"></i></button>
</div>
<div class="">
    <form class="ajax-request" action="{{route('admin.role-and-permission.permission-update')}}" method="POST"
          enctype="multipart/form-data" data-handler="commonResponse">
        @csrf

        <div class="d-flex cg-5">
            <input type="hidden" name="role" value="{{encrypt($roleData->id)}}">
            <h4 class="fs-14 fw-600 lh-20 text-title-black pb-25"> {{__("Role Name: ")}}</h4>
            <h4 class="fs-14 fw-500 lh-20 text-title-black pb-25 al"> {{$roleData->name}}</h4>
        </div>
        <ul class="zList-pb-10 pb-20">
            @foreach($permissionList as $key=>$item)
                @if(count($rolePermissions) > 0)
                    @php($flag=0)
                    @foreach($rolePermissions as $rolePermisonItem)
                        @if($rolePermisonItem->name == $item->name)
                            @if($roleData->id == 2)
                                <li>
                                    <div class="sf-form-checkbox">
                                        <input type="checkbox" class="form-check-input" id="projectManager{{$key}}"
                                               value="{{$item->name}}" name="permission[]" checked/>
                                        <label for="projectManager{{$key}}">{{$item->name}}</label>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <div class="sf-form-checkbox">
                                        <input type="checkbox" class="form-check-input" id="projectManager{{$key}}"
                                               value="{{$item->name}}" name="permission[]"
                                               checked {{($roleData->id == 1)?'disabled':''}}/>
                                        <label for="projectManager{{$key}}">{{$item->name}}</label>
                                    </div>
                                </li>
                            @endif
                            @php($flag=0)
                            @break
                        @else
                            @php($flag=1)
                        @endif
                    @endforeach
                    @if($flag == 1)
                        <li>
                            <div class="sf-form-checkbox">
                                <input type="checkbox" class="form-check-input" id="projectManager{{$key}}"
                                       value="{{$item->name}}"
                                       name="permission[]" {{($roleData->id == 1)?'disabled':''}}/>
                                <label for="projectManager{{$key}}">{{$item->name}}</label>
                            </div>
                        </li>
                    @endif
                @else
                    <li>
                        <div class="sf-form-checkbox">
                            <input type="checkbox" class="form-check-input" id="projectManager{{$key}}"
                                   value="{{$item->name}}" name="permission[]"/>
                            <label for="projectManager{{$key}}">{{$item->name}}</label>
                        </div>
                    </li>
                @endif

            @endforeach

        </ul>
        <div class="bd-t-one bd-c-stroke pt-17 d-flex g-10">
            <button type="button"
                    class="py-13 px-20 bd-one bd-ra-4 bd-c-main-color bg-white text-main-color fs-14 fw-600 lh-14"
                    data-bs-dismiss="modal" aria-label="Cancel">{{__("Cancel")}}</button>
            @if($roleData->id != 1)
                <button type="submit"
                        class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14">{{__("Save")}}</button>
            @endif
        </div>
    </form>
</div>
