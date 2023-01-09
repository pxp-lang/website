import DefaultTheme from "vitepress/theme";
import "./index.css";

export default {
    ...DefaultTheme,
    enhanceApp(ctx) {
        DefaultTheme.enhanceApp(ctx);
    },
};