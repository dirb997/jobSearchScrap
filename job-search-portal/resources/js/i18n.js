import { createI18n } from 'vue-i18n';
import enBasic from './locales/en/basic';
import esBasic from './locales/es/basic';

const messages = {
    en: enBasic,
    es: esBasic,
};

const locale = localStorage.getItem('locale') || 'en';

export const i18n = createI18n({
    legacy: false,
    locale,
    fallbackLocale: 'en',
    messages,
});

export function setLocale(nextLocale) {
    i18n.global.locale.value = nextLocale;
    localStorage.setItem('locale', nextLocale);
}