import * as esbuild from 'https://deno.land/x/esbuild@v0.15.18/mod.js'

console.dir(Deno.cwd());

const CWD = Deno.cwd();

esbuild.build({
    entryPoints: ["Partarum/PartarumJS/ClientSide/Design/Design.js", "Partarum/PartarumJS/ClientSide/HTML/HTML.js", "Partarum/PartarumJS/ClientSide/Partarum.js"],
    format: "esm",
    bundle: true,
    sourcemap: true,
    minify: true,
    outdir: './Partarum/PartarumJSBuild'
}).then((result, error) => {

    console.dir(result);
    esbuild.stop();

    (async () => {
        for await (const dirEntry of Deno.readDir('Partarum/PartarumJSBuild')) {
            console.log(dirEntry);
        }
    })();


}).catch((err) => {
   console.dir(err);
   esbuild.stop();
});