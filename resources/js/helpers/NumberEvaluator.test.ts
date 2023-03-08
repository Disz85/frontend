import { expect, describe, it } from 'vitest';
import NumberEvaluator from './NumberEvaluator';

const testCases = [
    { input: '2+2', expected: true },
    { input: '2-2', expected: true },
    { input: '2+3', expected: false },
    { input: '2-3', expected: false },
    { input: '0', expected: true },
    { input: '-2+2', expected: false },
    { input: 'a+b', expected: 'Input string contains invalid characters.' },
];

describe('NumberEvaluator(): true if it is in the string received as input the result of the operation is an even number, false if it is odd, and throw error if it invalid value',
    () => {
    testCases.forEach((testCase) => {
        it(`should return ${testCase.expected} for input ${testCase.input}`, () => {
            const numberEvaluator = new NumberEvaluator(testCase.input);
            if (typeof testCase.expected === 'boolean') {
                expect(numberEvaluator.evaluate()).toBe(testCase.expected);
                return;
            }
            expect(() => numberEvaluator.evaluate()).toThrow(testCase.expected);
        });
    });
});
