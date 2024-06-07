
@if(count($allStudent)>0)
    @foreach ($allStudent as $item)
        <li>
            <div class="dropdown-item">
                <div class="d-flex align-items-center g-10">
                <input type="checkbox" name="student_assign[]" value="{{$item->student->id}}" class="form-check-input mt-0 shadow-none" id="assignSpecialApproval{{$item->student->id}}" />
                <label for="assignSpecialApproval{{$item->student->id}}">
                    <div class="d-flex align-items-center g-8">
                        <div class="flex-shrink-0 w-25 h-25 rounded-circle overflow-hidden"><img src="{{getFileLink($item->student->picture)}}" alt="" /></div>
                        <div class="content">
                            <p class="fs-12 fw-600 lh-16 text-textBlack">{{$item->student->name}}</p>
                            <p class="fs-12 fw-600 lh-13 text-para-text">{{$item->student->email}}</p>
                        </div>
                    </div>
                </label>
                </div>
            </div>
        </li>
    @endforeach
@endif

