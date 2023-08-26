import dotenv from 'dotenv';
import { defineConfig } from 'vite';
import sass from 'sass';
import postcssPresetEnv from 'postcss-preset-env';
import postcssFor from 'postcss-for'; // Import postcss-for

dotenv.config();

export default defineConfig({
  publicDir: 'resources/static',
  build: {
    assetsDir: '',
    emptyOutDir: true,
    manifest: true,
    outDir: `public/themes/${process.env.WP_DEFAULT_THEME}/assets`,
    rollupOptions: {
      input: 'resources/js/index.js',
    },
  },
  plugins: [
    {
      name: 'php',
      handleHotUpdate({ file, server }) {
        if (file.endsWith('.php')) {
          server.ws.send({ type: 'full-reload', path: '*' });
        }
      },
    },
  ],
  css: {
    postcss: {
      plugins: [
        postcssPresetEnv({ stage: 3, features: { 'nesting-rules': true } }),
        postcssFor(), // Use postcss-for here
      ],
    },
    preprocessorOptions: {
      sass: {
        implementation: sass,
      },
    },
  },
});
