<!DOCTYPE html>
<html>

<head>
    <title>Calculator Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #343434;
            text-align: center;
            background-image: url('/images/sulat.webp');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;

        }

        h1 {
            color: #f3a7ff;
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 460px;
            height: 460px;
            background-color: rgba(97, 97, 97, 0.8);
            border-radius: 50%;
            box-shadow: 0 0 50px rgba(161, 21, 163, 0.5);
        }


        .circle {
            border: #f3a7ff solid 3px;
            height: 460px;
            width: 460px;
            padding: 1rem;
            margin: 0 auto;
            border-radius: 50%;
            box-shadow: 0 0 50px rgba(161, 21, 163, 0.5);
        }

        label {
            display: block;
            font-size: 1rem;
            color: white;
            font-weight: bold;
            padding: 0.2rem;
            margin-top: 0.4rem;

        }

        input,
        select {
            background-color: rgba(252, 207, 254, 0.6);
            color: #333;
            padding: 0.6rem 1rem;
            border: 1px solid #cccccc58;
            border-radius: 1rem;
            font-size: 1rem;
            max-width: 300px;
            margin: 0.3rem 0;

        }

        button {
            padding: 0.6rem 1rem;
            background-color: #f787ff;
            color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            margin-top: 1.3rem;
        }

        button:hover {
            background-color: #1b63d8;
        }


        .result {

            padding: 1rem;
            background-color: rgba(255, 221, 248, 0.663);
            border-radius: 1rem;
            width: 300px;
            margin: 1rem auto;
            margin-top: 3rem;
            text-align: center;
        }

        .result h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: #2c0931;
        }

        .result p {
            font-size: 1.2rem;
            color: #333;

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
