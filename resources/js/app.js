import.meta.glob('../images/**', {
    eager: true,
    query: '?url',
    import: 'default',
});

function localizeDates() {
    document
        .querySelectorAll('time[data-local-date], time[data-local-datetime]')
        .forEach((element) => {
            const date = new Date(element.dateTime);
            element.textContent = element.hasAttribute('data-local-date')
                ? date.toLocaleDateString()
                : date.toLocaleString();
        });
}

document.addEventListener('livewire:navigated', localizeDates);
