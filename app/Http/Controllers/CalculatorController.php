<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'value1' => 'required|numeric',
            'value2' => 'required|numeric',
            'operation' => 'required|in:add,subtract,multiply,divide',
        ]);

        $value1 = $request->input('value1');
        $value2 = $request->input('value2');
        $operation = $request->input('operation');

        $result = 0;
        $errorMessage = 'You can not divide a number by zero';

        if ($operation === 'add') {
            $result = $value1 + $value2;
        } elseif ($operation === 'subtract') {
            $result = $value1 - $value2;
        } elseif ($operation === 'multiply') {
            $result = $value1 * $value2;
        } elseif ($operation === 'divide') {
            if ($value2 == 0) {
                echo $errorMessage;
                return;
            }
            $result = $value1 / $value2;
        }

        $operatorSymbols = [
            'add' => '+',
            'subtract' => '-',
            'multiply' => '*',
            'divide' => '/',
        ];

        return view('calculator', [
            'value1' => $value1,
            'value2' => $value2,
            'operation' => $operation,
            'result' => $result,
            'operatorSymbols' => $operatorSymbols,
        ]);
    }
}
