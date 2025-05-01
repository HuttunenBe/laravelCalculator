<!DOCTYPE html>
<html>

<head>
    <title>Converter Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #343434;
            text-align: center;
            background-image: url('/images/sulat.webp');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .container {
            width: 440px;
            height: 440px;
            background-color: rgba(97, 97, 97, 0.8);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 100px auto;
            padding: 20px;
        }

        .circle {
            border: #f3a7ff solid 3px;
            height: 440px;
            width: 440px;
            padding: 1rem;
            margin: 0 auto;
            border-radius: 50%;
        }

        h1 {
            color: #f3a7ff;
            font-size: 36px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 1rem;
            color: white;
            font-weight: bold;
            padding: 0.2rem;
            margin: 0;
        }

        input {
            background-color: rgba(252, 207, 254, 0.6);
            color: #333;
            padding: 0.6rem 1rem;
            border: 1px solid #cccccc58;
            border-radius: 1rem;
            font-size: 1rem;
            width: 100%;
            max-width: 300px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #f3a7ff;
        }

        select {
            background-color: rgba(252, 207, 254, 0.6);
            color: #333;
            padding: 0.6rem 1rem;
            border: 1px solid #cccccc58;
            border-radius: 1rem;
            width: 100%;
            max-width: 300px;
            font-size: 1rem;
            margin: 10px 0;
            box-sizing: border-box;
        }

        button {
            padding: 12px 25px;
            background-color: #f787ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #d81b60;
        }

        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: rgba(224, 255, 224, 0.8);
            border-radius: 10px;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            box-sizing: border-box;
            text-align: center;
        }

        .result h3 {
            font-size: 20px;
            margin-bottom: 10px;
            color: #f3a7ff;
        }

        .result p {
            font-size: 18px;
            color: #333;
            margin: 0;
        }
    </style>
</head>

<body>
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
                        {{ old('add', isset($operation) && $operation === 'add' ? 'selected' : '') }}>
                        + </option>
                    <option value="subtract"
                        {{ old('subtract', isset($operation) && $operation === 'subtract' ? 'selected' : '') }}>
                        - </option>
                    <option value="multiply"
                        {{ old('multiply', isset($operation) && $operation === 'multiply' ? 'selected' : '') }}>
                        * </option>
                    <option value="divide"
                        {{ old('divide', isset($operation) && $operation === 'divide' ? 'selected' : '') }}>
                         / </option>
                </select>
            </div>
            <button type="submit">Calculate</button>
        </form>


        @if (isset($result))
            <div class="result">
                <h3>Result:</h3>
                <p>
                    {{ $value1 }} {{ $operation }} {{ $value2 }} = {{ $result }}
                </p>
            </div>
        @endif
    </div>
</body>

</html>
