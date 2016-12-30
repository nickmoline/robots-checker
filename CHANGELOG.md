# Change Log

The format is based on [Keep a Changelog](http://keepachangelog.com/)
and this project adheres to [Semantic Versioning](http://semver.org/).

## [Unreleased]
### Fixed
### Changed
### Added
- Added Release Dates to releases in CHANGELOG - @nickmoline
- Added getters and setters for Redirects and Original URL to `Robots\Status` - @nickmoline
- Passed redirects and original url to `::createFromExisting` for `Robots\Status` - @nickmoline

## [v1.0.1] - 2016-12-27
### Fixed
- [#5](https://github.com/nickmoline/robots-checker/issues/5) Redirects not being followed and seen as a loop - @nickmoline
### Added
- Added MIT License File [LICENSE.txt](https://github.com/nickmoline/robots-checker/blob/master/LICENSE.txt) (was already specified in composer.json)  - @nickmoline
- Added [CONTRIBUTING.md](https://github.com/nickmoline/robots-checker/blob/master/CONTRIBUTING.md) for Contribution Instructions  - @nickmoline

## [v1.0.0] - 2016-12-26
### Added
- Initial Commits of base project - @nickmoline
- Classes for checking urls against various methods of robots exclusion - @nickmoline
- php-unit tests - @nickmoline

[Unreleased]: https://github.com/nickmoline/robots-checker
[v1.0.1]: https://github.com/nickmoline/robots-checker/releases/tag/v1.0.1
[v1.0.0]: https://github.com/nickmoline/robots-checker/releases/tag/v1.0.0
