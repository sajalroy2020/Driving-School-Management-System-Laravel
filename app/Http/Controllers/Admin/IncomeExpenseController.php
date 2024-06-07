<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\IncomeExpenseRequest;
use App\Http\Services\IncomeExpenseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IncomeExpenseController extends Controller
{
    public $incomeExpenseService;

    public function __construct()
    {
        $this->incomeExpenseService = new IncomeExpenseService();
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->incomeExpenseService->list($request);
        }
        $data['pageTitle'] = __("Income/Expense List");
        $data['activeIncomeExpenseMenu'] = "active";
        $data['getIncomeExpenseInfo'] = $this->incomeExpenseService->getIncomeExpenseInfo();
        return view('admin.income-expense.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Income/Expense Edit");
        $data['income_expense_data'] = $this->incomeExpenseService->getById(decrypt($id));
        return view('admin.income-expense.edit', $data)->render();
    }

    public function store(IncomeExpenseRequest $request)
    {
        return $this->incomeExpenseService->store($request);
    }

    public function destroy($id)
    {
        return $this->incomeExpenseService->destroy(decrypt($id));
    }

}
