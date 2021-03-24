# x-access-token plugin for Craft CMS 3.x

Craft CMS plugin to add 'x-access-token' Authentification capability

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1.  Open your terminal and go to your Craft project:

        cd /path/to/project

2.  Then tell Composer to load the plugin:

        composer require AurelienZMN/x-access-token

3.  In the Control Panel, go to Settings → Plugins and click the “Install” button for x-access-token.

## x-access-token Overview

- This is a test plugin. Not for production.

## Using x-access-token

```javascript
const authLink = setContext((_, { headers }) => {
  const bearer = store.getters["user/bearer"];
  if (bearer) {
    return {
      headers: {
        ...headers,
        "x-access-token": `JWT ${bearer}`,
      },
    };
  }
  return {};
});
```

Brought to you by [Aurelien Zimmermann](https://github.com/AurelienZMN)
