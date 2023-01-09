import { defineConfig } from 'vitepress'
import { BUNDLED_LANGUAGES } from 'shiki'

// NOTE: This is a hack to get Shiki to highlight PXP the same as PHP until we sort out our own grammar.
const php = BUNDLED_LANGUAGES.find(lang => lang.id === 'php')
if (php) {
    php.aliases ||= [];
    php.aliases.push('pxp')
}

export default defineConfig({
    title: 'The PXP Language',
    description: 'A superset of PHP with extended syntax and runtime capabilities.',

    themeConfig: {
        siteTitle: false,

        logo: {
            light: '/logos/light.svg', dark: '/logos/dark.svg'
        },

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    { text: 'What is PXP?', link: '/introduction/what-is-pxp' }
                ]
            },
            {
                text: 'Getting Started',
                items: [
                    { text: 'Installation', link: '/getting-started/installation' },
                    { text: 'Your First PXP File', link: '/getting-started/your-first-pxp-file' },
                    { text: 'Project Configuration', link: '/getting-started/project-configuration' }
                ]
            },
            {
                text: 'Features',
                items: [
                    { text: 'Short Match', link: '/features/short-match' },
                    { text: 'Match Blocks', link: '/features/match-blocks' },
                    { text: 'Ranges', link: '/features/ranges' },
                    { text: 'Type Aliases', link: '/features/type-aliases' },
                    { text: 'Auto-capture Closures', link: '/features/auto-capture-closures' }
                ]
            }
        ],

        socialLinks: [
            { icon: 'github', link: 'https://github.com/pxp-lang' },
            { icon: 'discord', link: 'https://discord.gg/mCTx877dsV' }
        ],

        footer: {
            copyright: 'Copyright &copy; 2023 Ryan Chandler. All rights reserved.'
        }
    },

    markdown: {
        lineNumbers: true,
    }
})