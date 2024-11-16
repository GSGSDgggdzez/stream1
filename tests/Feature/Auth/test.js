const readline = require('readline');

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

let array = []; // Initialize an empty array
let count = 10; // Number of elements to collect
let currentIndex = 0; // Track the current index

// Function to ask for input
const askForInput = () => {
    if (currentIndex < count) {
        rl.question(`Enter element ${currentIndex + 1}: `, (input) => {
            array[currentIndex] = parseInt(input); // Store the input in the array
            currentIndex++; // Move to the next index
            askForInput(); // Ask for the next input
        });
    } else {
        console.log('Array collected:', array);
        rl.close(); // Close the readline interface
    }
};

// Start asking for input
askForInput();
