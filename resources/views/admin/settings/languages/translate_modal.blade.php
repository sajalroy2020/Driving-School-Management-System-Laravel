<h4 class="fs-18 fw-700 lh-24 text-textBlack pb-27">{{__("Translate Language")}}</h4>

<div class="zForm-wrap pb-20">
    <table class="table zTable zTable-last-item-right" id="employeesListTable">
        <thead>
        <tr>
            <th>
                <div>{{__("Language Key")}}</div>
            </th>
            <th>
                <div>{{__("Value")}}</div>
            </th>
            <th>
                <div>{{__("Action")}}</div>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($translators as $key=>$item)
            <tr>
                <td>
                    <textarea type="text" class="form-control sf-form-control key"
                              name="key" disabled required>{!! $key !!}</textarea>
                </td>
                <td>
                    <input type="hidden" value="0" class="is_new">
                    <textarea type="text" class="form-control sf-form-control value"
                              name="key" required>{!! $item !!}</textarea>
                </td>
                </td>
                <td>
                    <button type="submit"
                            class="py-13 px-20 bd-one bd-ra-4 bd-c-primary-color bg-primary-color text-white fs-14 fw-600 lh-14 update-translate-item">{{__("Update")}}</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<input type="hidden" id="updateTranslateItemRoute"
       value="{{ route('admin.setting.languages.update.translate', [$language->id]) }}">

