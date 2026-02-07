export function readOpenState(key) {
    return localStorage.getItem(key) === '1';
}

export function writeOpenState(key, value) {
    localStorage.setItem(key, value ? '1' : '0');
}
