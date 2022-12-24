import * as esbuild from 'https://deno.land/x/esbuild@v0.15.18/mod.js'

/*
const js = "let test_boolean = true";
const result = await esbuild.transform(js, { loader: 'js' })
console.log('result:', result)
esbuild.stop()
*/

console.dir(Deno.cwd());

const CWD = Deno.cwd();

for await (const dirEntry of Deno.readDir('./Partarum')) {
    console.log(dirEntry);
}

console.dir(esbuild);


esbuild.build({
    entryPoints: ['./Partarum/PartarumJS/ClientSide/Partarum.js'],
    format: "esm",
    bundle: true,
    sourcemap: true,
    minify: true,
    outdir: './Partarum/PartarumJSBuild'
}).then((result, error) => {

    console.dir(result);
    esbuild.stop();



}).catch((err) => {
   console.dir(err);
   esbuild.stop();
});