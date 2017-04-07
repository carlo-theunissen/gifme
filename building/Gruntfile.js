/**
 * Created by CARLO on 7-4-2017.
 */
module.exports = function(grunt) {

    grunt.initConfig({
        typescript: {
            base: {
                src: ['../web/version/src/ts/**/*.ts'],
                dest: '../web/version/src/js/',
                options: {
                    sourceMap: true,
                    declaration: true
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-typescript');

    grunt.registerTask('default', ['typescript']);

};