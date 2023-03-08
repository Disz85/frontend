/**
 * NumberEvaluator
 */

class NumberEvaluator {
    private readonly input: string;
    private static readonly memo: Map<string, boolean> = new Map<string, boolean>();

    /**
     * Input.
     * @param {string} input - which numbers, plus and may contain a hyphen.
     */
    constructor(input: string) {
        this.input = input;
    }

    /**
     * Check method uses a regular expression to test if the input string contains any character other than digits,
     * plus (+) and minus (-) characters.
     */
    private check(): void {
        const regex = /^[0-9+\-]+$/;
        if (!regex.test(this.input)) {
            throw new Error("Input string contains invalid characters.");
        }
    }

    /**
     * Evaluate.
     * @return {boolean} true if it is in the string received as input
     * the result of the operation is an even number, false if it is odd.
     * In the evaluate method, the input string is split into two arrays using regular expressions: numbers and operators.
     */
    public evaluate(): boolean {
        /**
         * Call check method if input invalid it will throw error,
         */
        this.check();

        /**
         * Memoization
         * We first check if the memo contains a cached result for the current input string.
         * If it does, we return the cached result.
         */
        if (NumberEvaluator.memo.has(this.input)) {
            return NumberEvaluator.memo.get(this.input)!;
        }

        /**
         * @constant numbers - array contains all the numbers in the input string as integers,
         */
        const numbers: number[] = this.input
            .split(/[+-]/)
            .map((numbers) => parseInt(numbers, 10));

        /**
         * @constant operators - array contains all the operators used in the input string (+ or -).,
         */
        const operators: string[] = this.input
            .split(/\d+/)
            .filter((plusAndMinus) => plusAndMinus !== '');

        /**
         * @constant result - The reduce method is then used to perform the arithmetic operation on
         * the numbers using the corresponding operators. The initial value of the accumulator is set to 0,
         * and for each number in the numbers array, the corresponding operator in the operators array is used to
         * either add or subtract the number from the accumulator
         */
        const result: number = numbers.reduce((acc, num, index) => {
            if (operators[index] === '-') {
                return acc - num;
            }
            return acc + num;
        }, 0);

        const isEven: boolean = result % 2 === 0;

        /**
         * We perform the same evaluation logic as before, and store the result in the memo map before returning it.
         */
        NumberEvaluator.memo.set(this.input, isEven);

        /**
         * Finally, the evaluate method returns true if the result of the operation is even and false if it's odd.
         */
        return isEven;
    }
}

export default NumberEvaluator;
