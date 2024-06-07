<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Requests\Admin\IncomeExpenseRequest;
use App\Http\Services\IncomeExpenseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
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
        $data['pageTitle'] = __("Expense List");
        $data['activeExpenseMenu'] = "active";
        $data['getIncomeExpenseInfo'] = $this->incomeExpenseService->getIncomeExpenseInfo();
        return view('Instructor.income-expense.list', $data);
    }

    public function edit($id)
    {
        $data['pageTitle'] = __("Expense Edit");
        $data['income_expense_data'] = $this->incomeExpenseService->getById(decrypt($id));
        return view('Instructor.income-expense.edit', $data)->render();
    }

    public function view($id)
    {
        $data['pageTitle'] = __("Expense Edit");
        $data['income_expense_data'] = $this->incomeExpenseService->getById(decrypt($id));
        return view('Instructor.income-expense.view', $data)->render();
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
