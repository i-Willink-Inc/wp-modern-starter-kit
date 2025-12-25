FROM mcr.microsoft.com/devcontainers/base:ubuntu

# Install Docker CLI for wp-env
RUN apt-get update && apt-get install -y \
    docker.io \
    docker-compose \
    && rm -rf /var/lib/apt/lists/*

# Add vscode user to docker group
RUN usermod -aG docker vscode

# Set working directory
WORKDIR /workspaces

# The devcontainer features will install Node.js and PHP
