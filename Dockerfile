# This file is a template, and might need editing before it works on your project.
# This Dockerfile installs a compiled binary into a bare system.
# You must either commit your compiled binary into source control (not recommended)
# or build the binary first as part of a CI/CD pipeline.

FROM buildpack-deps:jessie

WORKDIR /usr/local/bin

# Change `app` to whatever your binary is called
Add app .
CMD ["./app"]
