<!DOCTYPE html>
<html>

<head>
    <title>Calculator Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #343434;
            text-align: center;
            background-image: url('images/calculatorBackground.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;

        }

        h1 {
            color: white;
            font-size: 2rem;
            font-weight: 900;
            text-transform: uppercase;
            margin-bottom: 1rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 460px;
            height: 460px;
            background-color: rgba(255, 255, 255, 0.08);

            border-radius: 50%;
            box-shadow: 0 0 50px rgba(161, 21, 163, 0.5);
        }


        .circle {
            border: 3px solid rgba(255, 237, 250, 0.6);
            height: 460px;
            width: 460px;
            padding: 1rem;
            margin: 0 auto;
            margin-top: 10%;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            box-shadow: 0 0 50px rgba(161, 21, 163, 0.5);
        }

        label {
            display: block;
            font-size: 1rem;
            color: #ffffff;
            font-weight: bold;
            padding: 0.2rem;
            margin-top: 0.4rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.6);

        }

        input,
        select {
            background-color: rgba(255, 245, 252, 0.8);
            color: #5a3f42;
            padding: 0.6rem 0.2rem;
            border: 1px solid #cccccc58;
            border-radius: 1rem;
            font-size: 1rem;
            max-width: 300px;
            margin: 0.3rem 0;
            transition: all 0.3s ease;
        }


        input:hover,
        select:hover {
            background-color: rgba(255, 245, 252, 0.95);
        }


        input:focus,
        select:focus {
            outline: 4px solid #d66fbe;
            background-color: #fffafc;

        }

        button {
            padding: 0.6rem 1.3rem;
            background-color: #e73cf4;
            color: white;
            border: none;
            border-radius: 1rem;
            cursor: pointer;
            font-size: 1.1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 1.3rem;
        }

        button:hover {
            background-color: #1b63d8;
            transform: scale(1.03);
        }


        .result {
            padding: 1rem;
            background-color: rgba(255, 245, 252, 0.803);
            border-radius: 1rem;
            width: 300px;
            margin: 1rem auto;
            margin-top: 3rem;
            margin-bottom: 2rem;
            text-align: center;
            box-shadow: 0 4px 10px rgba(80, 42, 60, 0.2);
        }

        .result h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: #8d4b6d;
        }

        .result p {
            font-size: 1.2rem;
            color: #4b2e38;

        }
    </style>
</head>

<body>
    <div class='circle'>
        <div class="container">
            <h1>Calculator</h1>
            <form action="{{ route('calculator.calculator') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="value1">Enter a number:</label>
                    <input type="number" name="value1" id="value1" step="any"
                        value="{{ old('value1', isset($value1) ? $value1 : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="value2">Enter a number:</label>
                    <input type="number" name="value2" id="value2" step="any"
                        value="{{ old('value2', isset($value2) ? $value2 : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="operation">Select Operation:</label>
                    <select name="operation" id="operation" required>
                        <option value="" disabled selected>Select a Operation</option>
                        <option value="add"
                            {{ old('operation', isset($operation) && $operation === 'add' ? 'selected' : '') }}>
                            + </option>
                        <option value="subtract"
                            {{ old('operation', isset($operation) && $operation === 'subtract' ? 'selected' : '') }}>
                            - </option>
                        <option value="multiply"
                            {{ old('operation', isset($operation) && $operation === 'multiply' ? 'selected' : '') }}>
                            * </option>
                        <option value="divide"
                            {{ old('operation', isset($operation) && $operation === 'divide' ? 'selected' : '') }}>
                            / </option>
                    </select>
                </div>
                <button type="submit">Calculate</button>
            </form>
        </div>

        @if (isset($result))
            <div class="result">
                <h3>Result:</h3>
                <p>
                    {{ $value1 }} {{ $operatorSymbols[$operation] }} {{ $value2 }} = {{ $result }}
                </p>
            </div>
        @endif
    </div>
</body>

</html>
