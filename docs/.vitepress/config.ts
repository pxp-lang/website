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
    lastUpdated: true,
    
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
                ],
                collapsible: true,
            },
            {
                text: 'Getting Started',
                items: [
                    { text: 'Installation', link: '/getting-started/installation' },
                    { text: 'Project Configuration', link: '/getting-started/project-configuration' },
                    { text: 'Your First PXP File', link: '/getting-started/your-first-pxp-file' }
                ],
                collapsible: true,
            },
            {
                text: 'Features',
                items: [
                    { text: 'Short Match', link: '/features/short-match' },
                    { text: 'Match Blocks', link: '/features/match-blocks' },
                    { text: 'Auto-capture Closures', link: '/features/auto-capture-closures' },
                    { text: 'Conditional Returns', link: '/features/conditional-returns' },
                    {
                        text: 'Under Discussion',
                        items: [
                            { text: 'Type Aliases', link: '/features/under-discussion/type-aliases' },
                            { text: 'Generics', link: '/features/under-discussion/generics' },
                            { text: 'Variable Types', link: '/features/under-discussion/variable-types' },
                            { text: 'Constant Variables', link: '/features/under-discussion/constant-variables' },
                            { text: 'Pattern Matching', link: '/features/under-discussion/pattern-matching' },
                            { text: 'Operator Overloading', link: '/features/under-discussion/operator-overloading' },
                        ],
                    }
                ],
                collapsible: true,
            }
        ],

        socialLinks: [
            { icon: 'github', link: 'https://github.com/pxp-lang' },
            { icon: 'discord', link: 'https://discord.gg/mCTx877dsV' }
        ],

        footer: {
            copyright: 'Copyright &copy; 2023 Ryan Chandler. All rights reserved.'
        },

        editLink: {
            pattern: 'https://github.com/pxp-lang/website/edit/main/docs/:path',
            text: 'Edit this page on GitHub'
        }
    },

    markdown: {
        lineNumbers: true,
    }
})