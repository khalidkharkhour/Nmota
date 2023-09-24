import dotenv from 'dotenv';
import { defineConfig } from 'vite';
import sass from 'sass';
import postcssPresetEnv from 'postcss-preset-env';
import postcssFor from 'postcss-for';
import { resolve } from 'path'; // Importez la fonction resolve de path

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
    // Ajoutez le plugin "select2" ici
    {
      name: 'select2',
      resolveId(id) {
        if (id === 'select2') {
          return resolve(__dirname, 'node_modules/select2/dist/js/select2.full.min.js');
        }
      },
    },
    // Ajoutez le plugin "confetti-js" ici
    {
      name: 'confetti-js',
      resolveId(id) {
        if (id === 'confetti-js') {
          return resolve(__dirname, 'node_modules/canvas-confetti/dist/confetti.browser.js');
        }
      },
    },
    // Ajoutez jQuery ici
    {
      name: 'jquery',
      resolveId(id) {
        if (id === 'jquery') {
          return resolve(__dirname, 'node_modules/jquery/dist/jquery.min.js');
        }
      },
    },
  ],
  css: {
    postcss: {
      plugins: [
        postcssPresetEnv({ stage: 3, features: { 'nesting-rules': true } }),
        postcssFor(),
      ],
    },
    preprocessorOptions: {
      sass: {
        implementation: sass,
      },
    },
  },
});
