const fs = require('fs')

const [xf, yf, aimf] = fs.readFileSync('input', 'utf8').split("\n") // Load input
    .filter(l => l) // Strip empty lines
    .map(c => c.split(' ')) // Split command into direction and value
    .map(([direction, valueString]) => [direction, parseInt(valueString, 10)]) // Parse value into int
    .reduce(([x, y, aim], [direction, value]) => ({
            'forward': [(x + value), (y + aim * value), aim],
            'up': [x, y, (aim - value)],
            'down': [x, y, (aim + value)],
        }[direction]), [0, 0, 0])

console.log(xf * yf)
