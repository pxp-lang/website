import Alpine from 'alpinejs';

Alpine.data("menu", () => ({
    show: false,
    open() {
        this.show = true;
    },
    close() {
        this.show = false;
    },
    toggle() {
        this.show = !this.show;
    },
}));

Alpine.start();
