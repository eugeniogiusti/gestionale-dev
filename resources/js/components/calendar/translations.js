export function getTranslations() {
    const element = document.getElementById('calendar');
    if (!element) return {};
    
    const data = element.dataset.translations;
    return data ? JSON.parse(data) : {};
}

export function t(key) {
    const translations = getTranslations();
    return translations[key] || key;
}