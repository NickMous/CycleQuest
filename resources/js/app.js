import "./bootstrap";
import * as Sentry from "@sentry/browser";
import "./notifications.js";

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});
