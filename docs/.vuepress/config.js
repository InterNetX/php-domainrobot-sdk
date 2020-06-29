const { description } = require('../../package')

module.exports = {
	/**
	 * Ref：https://v1.vuepress.vuejs.org/config/#title
	 */
	title: "PHP Domainrobot SDK Documentation",
	/**
	 * Ref：https://v1.vuepress.vuejs.org/config/#description
	 */
	description: description,
	theme: "vuepress-theme-thindark",
	/**
	 * Extra tags to be injected to the page HTML `<head>`
	 *
	 * ref：https://v1.vuepress.vuejs.org/config/#head
	 */
	head: [
		["meta", { name: "theme-color", content: "#f44300" }],
		["meta", { name: "apple-mobile-web-app-capable", content: "yes" }],
		["meta", { name: "apple-mobile-web-app-status-bar-style", content: "black" }],
	],
	base: "/php-domainrobot-sdk/",
	/**
	 * Theme configuration, here is the default theme configuration for VuePress.
	 *
	 * ref：https://v1.vuepress.vuejs.org/theme/default-theme-config.html
	 */
	themeConfig: {
		repo: "https://github.com/InterNetX/php-domainrobot-sdk",
		editLinks: false,
		docsDir: "",
		editLinkText: "",
		lastUpdated: false,
		nav: [
			{
				text: "Guide",
				link: "/guide/preamble.html",
			},
			{
				text: "InterNetX",
				link: "https://internetx.com",
			},
			{
				text: "Imprint",
				link: "https://www.internetx.com/en/legal/imprint/",
			},
			{
				text: "Terms and conditions",
				link: "https://www.internetx.com/en/legal/terms-and-conditions/",
			},
		],
		sidebar: {
			"/guide/": [
				{
					title: "Introduction",
					collapsable: false,
					children: ["preamble", "changelog", "installation", "examples"],
				},
				{
					title: "Basics",
					collapsable: false,
					children: ["logging", "requests", "headers", "exception"],
				},
				{
					title: "Working with Models",
					collapsable: false,
					children: ["working_with_models", "instantiating_models", "model_properties"],
				},
				{
					title: "Supported API calls",
					collapsable: false,
					children: [
						"api_tasks/certificate",
						"api_tasks/contact",
						"api_tasks/domain",
						"api_tasks/domain_cancelation",
						"api_tasks/domainstudio",
						"api_tasks/poll",
						"api_tasks/ssl_contact",
						"api_tasks/transfer_out",
						"api_tasks/trusted_app",
						"api_tasks/user",
						"api_tasks/zone",
					],
				},
				{
					title: "Available Constants",
					collapsable: false,
					children: [
						"constants/acl_restriction",
						"constants/crypto",
						"constants/contact_types",
						"constants/registry_status",
						"constants/time_unit",
					],
				},
			],
		},
	},

	/**
	 * Apply plugins，ref：https://v1.vuepress.vuejs.org/zh/plugin/
	 */
	plugins: [
		"@vuepress/plugin-back-to-top",
		"@vuepress/plugin-medium-zoom",
		"vuepress-plugin-smooth-scroll",
		[
			"vuepress-plugin-container",
			{
				type: "noheader",
				defaultTitle: "",
			},
		],
		[
			"vuepress-plugin-container",
			{
				type: "unobtrusive-info",
				defaultTitle: "",
			},
		],
	],

	markdown: {
		extendMarkdown: (md) => {
			md.set({ html: true });
			md.use(require("markdown-it-include"), "docs/guide/");
			// md.use(require('markdown-it-katex'))
			// md.use(require('markdown-it-plantuml'))
			//md.use(require("markdown-it-admonition"));
		},
	},
};
