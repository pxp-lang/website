import Alpine from 'alpinejs';
import './ast.js';

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
