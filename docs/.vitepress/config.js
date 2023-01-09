import { defineConfig } from 'vitepress'

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
            }
        ],

        socialLinks: [
            { icon: 'github', link: 'https://github.com/pxp-lang' },
            { icon: 'discord', link: 'https://discord.gg/mCTx877dsV' }
        ],

        footer: {
            copyright: 'Copyright &copy; 2023 Ryan Chandler. All rights reserved.'
        }
    }
})