// Read persisted panel visibility ("1" = open, everything else = closed).
export function readOpenState(key) {
    return localStorage.getItem(key) === '1';
}

// Persist panel visibility per project key.
export function writeOpenState(key, value) {
    localStorage.setItem(key, value ? '1' : '0');
}
